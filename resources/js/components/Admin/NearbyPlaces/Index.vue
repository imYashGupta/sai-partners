<template>
<div class="row">
	<div class="column col-lg-12">
		<div class="properties-box">
			<div class="inner-container">
				<div class="title"><h3>{{ name }}</h3></div>
				<div class="property-submit-form">
					
					<div class="title"><h3>Nearby Place Info</h3></div>
						<form @submit.prevent="addNearbyPlaces" id="nearbyplaces">
					<div class="row">
						<!-- Form Group -->
						<div class="form-group col-lg-2 col-md-6 col-sm-12">
							<label>Type</label>
							<input v-model="form.type" required type="text"  placeholder="e.g Hotel,School etc.." >
						</div>
						<!-- Form Group -->
						<div class="form-group col-lg-3 col-md-6 col-sm-12">
							<label>Name</label>
							<input v-model="form.name" required type="text"  placeholder="Name" >
						</div>
						<!-- Form Group -->
						<div class="form-group col-lg-3 col-md-6 col-sm-12">
							<label>Address</label>
							<input v-model="form.address" required type="text"  placeholder="Address"   >
						</div>
						<!-- Form Group -->
						<div class="form-group col-lg-2 col-md-6 col-sm-12">
							<label>Distance In KM</label>
							<input v-model="form.distance" required type="text"  placeholder="e.g 0.2,5"  >
						</div>
						<div class="form-group col-lg-2 col-md-6 col-sm-12">
							<button type="submit" class="theme-btn btn-style-one"  >Add Nearby</button>
						</div>
					</div>
						</form>
					<div class="title"><h3>Nearby Places</h3></div>
					<table class="table table-hover">
						<tbody>
							<tr v-for="(place,index) in nearbyplaces" >
								<td>{{ place.type }}</td>
								<td>{{ place.name }}</td>
								<td>{{ place.address }}</td>
								<td>{{ place.km }} Km</td>
								<td><a @click.prevent="deletePlace(place.id,index)" href=""><i class="la la-trash"></i> remove </a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script type="text/javascript">
	export default{
		props:["places","name","id"],
		data(){
			return {
				nearbyplaces:JSON.parse(this.places),
				form:{
					name:'',
					type:'',
					address:'',
					distance:''
				}
			}
		},
		methods:{
			addNearbyPlaces(){
				axios.post("/admin/nearby-places.add",{
					name:this.form.name,
					type:this.form.type,
					address:this.form.address,
					distance:this.form.distance,
					id:this.id
				}).then(response => {
					if (response.data.response==1) {
						swal("Nearby Places Added.", {
						    icon: "success",
						});
						this.nearbyplaces.unshift(response.data.place);
						document.getElementById("nearbyplaces").reset();

					} else {
						swal("Something went worng!", {
						    icon: "error",
						});
					}
				 
				}).catch(error => {
					console.log(error);
				})
				 
			},
			deletePlace(id,index){
				var vue=this;
				swal({
					  title: "Are you sure?",
					  text: "want to delete this nearby place?",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
				})
				.then((willDelete) => {
    				if (willDelete) {
    					axios.post('/admin/nearby-places.delete',{id:id})
    					.then(response => {
    						vue.nearbyplaces.splice(index,1);
						    swal("Nearby place has been deleted!", {
						      icon: "success",
						    });	
    					})
    					.catch(err => {
							swal("OH Snap!", "Something went wrong", "error")
    					})
  					}
				});
			}
		}
	}
</script>