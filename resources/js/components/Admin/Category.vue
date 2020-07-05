<template>
<div class="comments-tab">
	<h3>Property Category</h3>
	<div class="tabs-box">
		<ul class="tab-buttons">
			<li class="tab-btn active-btn" @click="create">Add New</li>
		</ul>
		<div class="container">
			<div class="row">
				<div class="col-md-12 pt-3">
					<ul class="list-style-one">
						<li v-for="(category,index) in categories">{{category.name}} <a  href="#" @click.prevent="deleteCategory(category.id,index)" v-if="category.id!=1"><i class="la la-trash"></i></a></li>
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
				categories:[]
			}
		},
		methods:{
			create(){
				swal("Add new Category:", {
  					content: "input",
  					  button: "Create",
				})
				.then((value) => {
					if (value!=null && value!='') {
						console.log(value)
	  				 	axios.post("/admin/category.create",{name:value})
	  				 	.then(response => {
	  				 		if (response.data.response==1) {	
	  				 			this.categories.unshift(response.data.data);
	  				 			swal("Success! New Category Added.", {
						      		icon: "success",
						    	});
	  				 		}
	  				 		else if(response.data.response==0){
	  				 			swal("This Category is Already Exists.",{
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
			deleteCategory(id,index){
				var vue=this;
				swal({
					  title: "Are you sure?",
					  text: "All Property having this category will be uncategorized",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,
				})
				.then((willDelete) => {
    				if (willDelete) {
    					axios.post('/admin/category.delete',{id:id})
    					.then(response => {
    						vue.categories.splice(index,1);
						    swal("Category has been deleted!", {
						      icon: "success",
						    });	
    					})
    					.catch(err => {
							swal("OH Snap!", "Something went wrong", "error")
    					})
  					}
				});
			}
		},
		created(){
			axios.get('/admin/categories')
			.then(response => {
				this.categories=response.data;
			})
			.catch(error => {
				console.log(error)
			});
		}
	}
</script>