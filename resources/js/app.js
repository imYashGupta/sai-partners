require('./bootstrap');
 
window.Vue = require('vue');
import properties from "./components/Property/properties.vue";
import Filter from "./components/Property/filter.vue";
import Amenities from "./components/Admin/Amenities/Index.vue";
import Category from "./components/Admin/Category.vue";
import NearbyPlaces from "./components/Admin/NearbyPlaces/Index.vue";
import Floor from "./components/Admin/Floor/Index.vue";
import Messages from "./components/Admin/Messages/Index.vue";
import Contact from "./components/Property/contact.vue";
import ContactForm from "./components/ContactUs/form.vue";
import ToggleTeam from "./components/Admin/Team/ToggleTeam.vue";
export const eventBus = new Vue();
 const app = new Vue({
    el: '#app',
    data(){
    	return{
    		name:"test",
    		cities:[],
            account:false,
    	}
    },
    components:{
    	"app-properties":properties,
    	"app-amenities":Amenities,
    	"app-category":Category,
    	"app-floor":Floor,
    	"nearbyplaces":NearbyPlaces,
    	"app-filter":Filter,
        "app-contact":Contact,
        "app-contact-us":ContactForm,
        "app-message":Messages,
        "app-toggles":ToggleTeam,
    },
    methods:{
    	getCities(state){
    		axios.get("/states.cities/api/"+state)
    		.then(response => {
    			console.log(response);
    			this.cities=response.data;
    		}).catch(error => {
    			console.log(error);
    		})
    	},
    	getState(id){
    		let state=$('#state').find(":selected").data("id");
    		this.getCities(state);
    	},
    	deletePropertyDialog(event,ref){
    		var vue=this;
    		var link=$(event.target).attr("href");
    		swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this property",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
			  	if (willDelete) {
			  		axios.get(link)
			  		.then(response => {
			  			console.log(response);
			  			if (response.data.response==1) {
					    	swal("Poof! Property has been deleted!", {
					      		icon: "success",
					    	});
					    	console.log(vue.$refs[ref]);
			  				$(vue.$refs[ref]).remove();
			  			}
			  		})
			  		.catch(er => {
			  			console.log(er);
			  			swal("Oh Snap! Something went wrong.",{
			  				icon:"danger"
			  			});
			  		})
			  	}
			});
    	},
        deleteTeamDialog(event,ref){
            var vue=this;
            var link=$(event.target).attr("href");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    axios.get(link).then(response=>{
                        swal("Team Member Deleted.", {
                            icon: "success",
                        });
                        $(vue.$refs[ref]).remove();
                    }).catch(err => {
                        console.log(err);
                    });
                }
            });
        },
        approveProperty(element,id){
      
            swal({
                title: "Are you sure?",
                text: "Want to Approve this property",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
            .then((approve) => {
                if (approve) {
                    swal("Please Wait");
                     axios.post("/admin/approve-property",{id:id})
                     .then(response => {
                        console.log(response);
                        swal(response.data.msg, {
                            icon: "success",
                        });
                        $(this.$refs[element]).remove();

                     }).catch(error => {
                        swal("Oh Snap! Something went wrong.",{
                            icon:"danger"
                        });
                        console.log(error);
                     })
                }
            });
        }
    },
    computed:{
        shuffle(array) {
          var currentIndex = array.length, temporaryValue, randomIndex;

          // While there remain elements to shuffle...
          while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
          }

          return array;
        }
    }
   
});

 