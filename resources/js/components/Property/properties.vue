<template>
<!-- Property Block -->
<div id="test">
	<div v-if="properties.length == 0">
 		No Properties in This category
 	</div>
	<div    v-for="(property,index) in properties" class="property-block-three">
	    <div class="inner-box">
	        <div class="row clearfix">
	            <div class="column col-xl-6 col-lg-12 col-md-12 col-sm-12">
	                <div class="image-box">
	                    <figure class="image"><img :src="property.thumbnail" alt=""></figure>
	                    <span class="for">FOR SALE</span>
	                    <span class="featured">FEATURED {{ id }}</span>
	                    <ul class="info clearfix">
	                        <li><i class="la la-calendar-minus-o"></i>{{property.timeago}}</li>
	                    </ul>
	                </div>
	            </div>

	            <div class="column col-xl-6 col-lg-12 col-md-12 col-sm-12">
	                <div class="lower-content">
	                    <ul class="tags">
	                        <li><a :href="'/properties?type='+property.type+'&category='+property.category">{{ property.category }}</a></li>
	                        
	                    </ul>
	                   <!--  <div class="thumb"><img src="images/resource/thumb-9.jpg" alt=""></div> -->
	                    <h3><a :href="'/property-detail/'+property.id">{{ property.title }}</a></h3>
	                    <div class="lucation"><i class="la la-map-marker"></i> {{ property.fulladdress }}</div>
	                    <ul class="property-info clearfix">
	                        <li><i class="flaticon-dimension"></i> 506 Sq-Ft</li>
	                        <li><i class="flaticon-bed"></i>{{property.bedroom}} {{ property.bedroom > 1 ? "Bedrooms" : "Bedroom" }}</li>
	                        <li><i class="flaticon-cup"></i>{{property.kitchens}} {{ property.kitchens > 1 ? "Kitchens" : "Kitchen" }}</li>
	                        <li><i class="flaticon-bathtub"></i>{{property.bathroom}} {{ property.bathroom > 1 ? "Bathroom" : "Bathrooms" }}</li>
	                    </ul>
	                    <div class="property-price clearfix">
	                        <div class="read-more"><a :href="'/property-detail/'+property.id" class="theme-btn">More Detail</a></div>
	                        <div class="price">
adasd
	                         {{property.amount==0 ? "SOLD" : '&#x20b9'+property.amount  }}</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div> 
 	</div>
 	
 		<div class="text-center">
	 		<div v-if="loading" class="spinner-grow">Loading...</div>
	 		<br>
			<button v-if="nextpageUrl!=null" type="button" @click="loadmore" class="theme-btn btn-style-one text-center" style="border-radius: 50px;box-shadow: 0px;">Load More</button>
 		</div>
	 
</div>
</template>
<script type="text/javascript">
	 
	import {eventBus} from './../../app';

	export default{
		props:["id"],
		data(){
			return{
				properties:[],
				nextpageUrl:'',
				filters:{},
				loading:false,
			}
		},
		methods:{
			loadmore(){
				this.loading=true;
				axios.post(this.nextpageUrl,this.filters)
				.then(response => {
					console.log(response.data.data)
					for (var i = 0; i < response.data.data.length; i++) {
						this.properties.push(response.data.data[i]);
					}	
					this.nextpageUrl=response.data.next_page_url;
					this.loading=false;
				})
			}
		},
		created(){
			this.loading=true;
			axios.post("/properties/all",{
				type:this.id
			})
			.then(response => {
				this.properties=response.data.data;
				this.nextpageUrl=response.data.next_page_url;
				this.loading=false;
			})
			eventBus.$on("loading",()=>{
				this.loading=true;
			});
			eventBus.$on("properties",(data) => {
				console.log("event listen",data);
				this.properties=data.data.data;
				this.loading=false;
				this.nextpageUrl=data.data.next_page_url;
				this.filters=data.filter;
			})
		},
		 
	}
</script>
<style type="text/css">
 
@keyframes spinner-grow {
  0% {
    opacity: 0;
    transform: scale(0);
  }
  50% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    transform: scale(1);
  }
}

.spinner-grow {
  position: relative;
  display: inline-block;
  width: 2rem;
  height: 2rem;
  overflow: hidden;
  text-indent: -999em;
  background-color: #ff4136;
  border-radius: 50%;
  animation-name: spinner-grow;
  animation-duration: .75s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
}
</style>