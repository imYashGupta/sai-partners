<template>
	 <div class="row">
        <div class="column col-lg-12">
            <div class="messages-box">
                <div class="title pb-5">
                    <h3 class="float-left">Messages List <span style="font-weight: 100;">{{ (type) ? 'Property' : 'Contact' }}</span></h3>
                   	<button class="float-right theme-btn btn-style-six  btn-sm p-2 ml-2 " :class="(!type) ? 'selected' : '' " @click="changeType(0)">Contact</button>
                   	<button class="float-right theme-btn btn-style-six btn-sm p-2 " :class="(type) ? 'selected' : '' " @click="changeType(1)">Property</button>
                </div>
                <div class="inner-box">
                    <!--comment-->
                    <article class="message-box" :class="(type) ? '' : 'pl-0' "  v-if="!loading" v-for="message in messages">
						<div class="thumb-box" v-if="message.property!=null">
							<figure class="thumb"><img :src="message.property.thumb"  alt=""></figure>
							<a :href="'/property-detail/'+message.id" target="_blank" class="reply-btn">View Property</a>
						</div>
                        <div class="content-box ">
                            <div class="name">{{message.name}} 
                            	<a :href="'mailto:'+message.email"><i class="la la-envelope-o"></i> {{ message.email }}</a> |
                            	<a :href="'tel:'+message.phone"><i class="la la-phone"></i>{{ message.phone }}</a>
                            </div>
                            <span class="date"><i class="la la-calendar"></i>{{ message.created_at }}</span>
                            <div class="text">{{message.message}} <a :href="'mailto:'+message.email">Reply</a></div>
                        </div>
                    </article>
                    <div v-if="loading" class="spinner-grow">Loading...</div>
                </div>

                <button v-if="nextpage!==null" class="theme-btn btn-style-one" @click="loadmoreMsgs">{{btnText}}</button>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return{
				messages:[],
				nextpage:{},
				btnText:"Load More",
				type:0,
				loading:false,
			}
		},
		methods:{
			changeType(type){
				this.loading=true;
				this.type=type;
				axios.get("messages.get",{
					params:{
						type:this.type
					}
				})
				.then(response => {
					console.log(response);
					this.messages=response.data.data;
					this.nextpage=response.data.next_page_url;
						this.loading=false;
				})
			},
			loadmoreMsgs(){
				this.btnText="Hold On..";
			 	axios.get(this.nextpage,{
			 		params:{
			 			type:this.type
			 		}
			 	}).then(response => {
			 		for (var i = 0; i < response.data.data.length; i++) {
						this.messages.push(response.data.data[i]);
					}
					this.nextpage=response.data.next_page_url;

					this.btnText="Load More";
			 	}).catch(error=>{
			 		console.log(error);
					this.btnText="Load More";

			 	})
			}
		},
		created(){
			axios.get("messages.get",{
				params:{
					type:this.type
				}
			})
			.then(response => {
				console.log(response);
				this.messages=response.data.data;
				this.nextpage=response.data.next_page_url;
			})

		}
	}
</script>
<style type="text/css" scoped="">
 	.selected{

    color: #ffffff;
    background-color: #00c0ff;
 
 	}
</style>