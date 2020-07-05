<template>
<span>
	<button title="Hide user on front-page" v-if="!active" type="button" class="btn btn-secondary" @click="changeStatus"><i class="la la-eye-slash"></i></button>
	<button title="Show user on front-page" type="button" v-else class="btn btn-secondary" @click="changeStatus"><i class="la la-eye"></i></button>
</span>

</template>
<script type="text/javascript">
	export default{
		props:["id","check"],
		data(){
			return {
				active:(this.check)==0 ? false : true,
			}
		},
		methods:{
			changeStatus(){
				swal({
			        title: "Are you sure?",
			        text: "want to perform this action?",
			        icon: "warning",
			        buttons: true,
			        dangerMode: true,
			    })
			    .then((willDelete) => {
			        if (willDelete) {
			            this.change();
			        }
			        else{
			        	this.active=this.active;
			        }
			    });
			},
			change(){
				axios.post("/admin/team.changestatus",{id:this.id})
				.then(response => {
					if (response.data.status===1) {
						swal("Success","User will not show on the front-page.","success");
						this.active=response.data.status;
					}
					else if(response.data.status===0){
						this.active=response.data.status;
						swal("Success","User will now show on the front-page.","success");
					}
					else{
						swal("Whoops","Something Went wrong","error");
					}
				}).catch(error => {
					console.log(error);
					("Whoops","Something Went wrong","error");
				})
			}

		}
	}
</script>