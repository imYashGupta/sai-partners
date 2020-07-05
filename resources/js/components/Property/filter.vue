<template>
<div class="sidebar-widget search-properties">
	<div class="sidebar-title"><h3>Search Properties</h3></div>
	<!-- Property Search Form -->
	<div class="property-search-form style-three">
		<form @submit.prevent="applyFilter">
			<div class="row no-gutters">
				<!-- Form Group -->
				<div class="form-group">
					<select   v-model="city" >
						<option selected=""  value="">All Cities</option>
						<option v-for="city in cities" :value="city.city">{{ city.city }}</option>
					</select>
				</div>
				<!-- Form Group -->
				<div class="form-group">
					<select   v-model="type" >
						<option value=""  selected="" >All</option>
						 <option v-for="type in types" :value="type.id">{{ type.name }}</option>
					</select>
				</div>
				<!-- Form Group -->
				<div class="form-group">
					<button type="submit" class="theme-btn btn-style-one">Search</button>
				</div>
			</div>
		</form>
	</div>
	<!-- End Form -->
</div>
</template>
<script type="text/javascript">
	import {eventBus} from './../../app';
	export default{
		data(){
			return {
				cities:[],
				types:[],
				city:"",
				type:""
			}
		},
		methods:{
			validateFilter(){
				 
				return true;
			},
			applyFilter(){
				eventBus.$emit("loading");
				if (this.validateFilter()) {
					axios.post("property/filter.api",{
						city:this.city,
						type:this.type
					}).then(response => { 
						eventBus.$emit("properties",{
							data:response.data,
							filter:{
								type:this.type,
								city:this.city
							}
						});
					})
					.catch(error => {
						console.log(error);
					})
				}
			}
		},
		created(){
			axios.get("/cities.api").then(response => {
				//console.log(response)
				this.cities=response.data;
			})
			axios.get("property/type.api")
			.then(response=>{
				//console.log(response)
				this.types=response.data;
			})
		}
	}
</script>