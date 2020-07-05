<template>
<div class="comments-tab">
	<h3>Amenities / Features</h3>
	<div class="tabs-box">
		<ul class="tab-buttons">
			<li class="tab-btn active-btn" @click="create">Add New</li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-md-12 pt-3">
					<ul class="list-style-one">
						<li v-for="(feature,index) in amenities">{{feature.name}} <a href="#" @click.prevent="deleteAmenities(feature.id,index)"><i class="la la-trash"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script type="text/javascript">
	export default{
		data(){
			return{
				amenities:[]
			}
		},
		methods:{
			create(){
				swal("Create New Amenities:", {
  					content: "input",
  					  button: "Create",
				})
				.then((value) => {
					if (value!=null && value!='') {
						console.log(value)
	  				 	axios.post("/admin/amenities.create",{name:value})
	  				 	.then(response => {
	  				 		if (response.data.response==1) {	
	  				 			this.amenities.unshift(response.data.data);
	  				 			swal("Success! New Amenities Created.", {
						      		icon: "success",
						    	});
	  				 		}
	  				 		else if(response.data.response==0){
	  				 			swal("This Amenities is Already Exists.",{
	  				 				icon:"info"
	  				 			});
	  				 		}
	  				 		else{
								swal("OH Snap!", "Something went wrong", "error")
	  				 		}
	  				 	})
	  				 	.catch(error => {
							swal("OH Snap!", "Something went wrong", "error")
							console.log(error)
						});
					}
				});
			},
			deleteAmenities(id,index){
				var vue=this;
				swal({
					  title: "Are you sure?",
					  text: "want to delete or remove Amenities!",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
				})
				.then((willDelete) => {
    				if (willDelete) {
    					axios.post('/admin/amenities.delete',{id:id})
    					.then(response => {
    						vue.amenities.splice(index,1);
						    swal("Amenities has been deleted!", {
						      icon: "success",
						    });	
    					})
  					}
				});
			}
		},
		created(){
			axios.get('/admin/amenities')
			.then(response => {
				this.amenities=response.data;
			})
			.catch(error => {
				console.log(error)
			});
		}
	}
</script>