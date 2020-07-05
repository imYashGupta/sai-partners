<template>
<div class="row">
	<div class="column col-lg-12">
		<div class="properties-box">
			<div class="inner-container">
				<div class="title"><h3> </h3></div>
				<div class="property-submit-form">
					
					<div class="title"><h3>Add Flooring</h3></div>
					<form method="POST" @submit.prevent="submit" id="floorForm">
						<div class="row">
							<!-- Form Group -->
							<div class="form-group col-lg-3 col-md-6 col-sm-12">
								<label>Floor Type</label>
								<select v-model="type" id="floorInt"  required="" name="type" @change="flooring" >
									<option disabled="" selected="" value="">Floor</option>
									<option data-int="0">Ground Floor</option>
									<option data-int="1">First Floor</option>
									<option data-int="2">Second Floor</option>
									<option data-int="3">Third Floor</option>
									<option data-int="4">Forth FLoor</option>
									<option data-int="5">5th FLoor</option>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-12">
								<label>Floor Type</label>
								<input @change="getfile" required="" type="file" class="form-control" name="">
							</div>
							<div class="form-group col-lg-3 col-md-6 col-sm-12">
								<button type="submit" class="theme-btn btn-style-one"  >{{btnText}}</button>
							</div>
						</div>
					</form>
					<div class="title"><h3>Floors</h3></div>
					<div class="container">
						<div class="row">
							<div class="col-12">
								<table class="table table-image">
									<thead>
										<tr>
											<th scope="col">Image</th>
											<th scope="col">Floor Name</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(flooring,index) in floors">
											<td class="w-25">
												<img :src="'/images/property/floors/'+flooring.image" alt="Sheep">
											</td>
											<td>{{flooring.floor}}</td>
											<td><a @click.prevent="deleteFloor(flooring.id,index)" href=""><i class="la la-trash"></i> Delete</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script type="text/javascript">
	export default{
		props:["id","floor"],
		data(){
			return{
				type:'',
				file:'',
				check:true,
				floorInt:$("#floorInt").find(':selected').data('int'),
				floors:this.floor,
				btnText:"Add Floor"
			}
		},
		methods:{
			flooring(event){
				let floorint=$(event.target).find(':selected').data('int');
				this.floorInt=floorint;
			},
			getfile(event){
				let file = event.target.files[0];
				this.file=file;
			},
			submit(event){
				this.btnText="Uploading...";
			let data = new FormData();
			data.append('floor', this.type)
			data.append('image',this.file)
			data.append('id',this.id)
			data.append('floorint',this.floorInt)
			data.append('check',this.check)
			let config = {
				header : {
					'Content-Type' : 'multipart/form-data'
				}
			}

			axios.post("/admin/flooring.add",data,config)
			.then(response => {
				console.log(response);
				if (response.data.response==1) {
					swal("Floor Added Successfully!", {
						icon: "success",
					});
					this.btnText="Add Floor";
					document.getElementById("floorForm").reset();
					this.floors.push(response.data.data);
					this.check=true;
				}
				else if(response.data.response==2)
				{
					this.reSubmit();
					this.check=true;
				} 
				else {
					swal("Something went wrong!", {
						icon: "error",
					});
				}
			})
			.catch(error => {
				console.log(error);
				swal("Something went wrong!", {
						icon: "error",
					});
			})
			
			},
			reSubmit(){
				swal({
				  title: "Floor Already exists!",
				  text: "Do you want to replace this with existing floor?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    this.check=false;
				    this.submit();	
				    

				  } 
				});
			},
			deleteFloor(id,index){
				swal({
				  title: "Are you sure?",
				  text: "want to delete this floor and data?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				  	axios.post("/admin/flooring.delete",{id:id})
				  	.then(response=>{
				  		if (response.data.response==1) {
				  			this.floors.splice(index,1);  
				  			swal("Floor Deleted!", {
								icon: "success",
							});
				  		} 
				  		else {
				  			swal("Something went wrong!", {
								icon: "error",
							});
				  		}
				  	}).catch(error =>{
				  		swal("Something went wrong!", {
							icon: "error",
						});
				  	})
				  } 
				});
			}
		}
}
</script>
<style type="text/scss"></style>
<style  ty scoped="">
.container {
padding: 2rem 0rem;
}
h4 {
margin: 2rem 0rem 1rem;
}
.table-image td, .table-image th {
vertical-align: middle;
}
</style>