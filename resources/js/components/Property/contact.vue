<template>
<div class="review-comment-form">
    <div v-if="errors.length > 0" id="alerts" class="alert alert-danger" style="    color: #f9f9f9;background-color: #ff4136;">
        <strong class="h5 font-weight-bold">Please Fix the following errors!</strong>
        <ul class="pl-3">
            <li v-for="err in errors" style="list-style: disc;">{{err[0]}}</li>
        </ul>
    </div>
    <div v-if="success" id="alerts" style="border-color: #b8ebd8;background-color: #02B875;    color: #fff;" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="h5 font-weight-bold">Thank you for getting in touch! </strong> <br><span style="font-size: 16px;">We appreciate you contacting us   . One of our colleagues will get back in touch with you soon!</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <h3>Contact Agent</h3>
    <form   ref="propertyForm" @submit.prevent="sent()" id="form">
        <div class="row">
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <input required=""  type="text" v-model="name"   placeholder="Full Name"  >
            </div>
            
            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                <input  required="" type="text" v-model="phone" placeholder="Phone Number"  >
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <input  required=""  type="email" v-model="email" placeholder="Email Address" required>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                <textarea required="" v-model="message" placeholder="Massage"></textarea>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 text-right">
                <button class="theme-btn btn-style-one" type="submit"  >{{btnText}}</button>
            </div>
        </div>
    </form>
</div>
</template>
<script type="text/javascript">
    export default{
        props:["id"],
        data(){
            return{
                name:'',
                email:'',
                phone:'',
                message:'',
                success:null,
                btnText:"Send Now",
                errors:[]
            }
        },
        methods:{
            sent(event){
                this.btnText="Sending...";
                swal("Please Wait!", "Sending Your Message...");
                axios.post("/contact.store",{
                    name:this.name,
                    email:this.email,
                    phone:this.phone,
                    message:this.message,
                    property_id:this.id
                }).then(response => {
                    this.success=true;
                    this.errors=[];
                    this.name = this.email = this.phone = this.message ='';
                    this.btnText="Send Now";
                    swal("Good job!", "Your Message has Been Sent", "success");
                    //event.target.reset();
                }).catch(error => {
                    this.btnText="Send Now";
                    this.errors=Object.values(error.response.data.errors);
                    swal("Oh Snap", "We've got an error while sending message Please try again!", "error");
                    
                })
            }
        }
    }
</script>