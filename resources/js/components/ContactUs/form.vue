<template>
<div>
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
	<div class="contact-form">
		<form @submit.prevent="sent()">
			<div class="form-group">
				<input type="text" v-model="name" placeholder="Name" required>
			</div>
			
			<div class="form-group">
				<input type="email" v-model="email" placeholder="Email" required>
			</div>
			<div class="form-group">
				<input type="text" v-model="phone" placeholder="Phone" required>
			</div>
			<div class="form-group">
				<textarea v-model="message" placeholder="Massage" required=""></textarea>
			</div>
			
			<div class="form-group">
				<button class="theme-btn btn-style-one" type="submit" name="submit-form">{{btnText}}</button>
			</div>
		</form>
	</div>
</div>
</template>
<script type="text/javascript">
    export default{
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
                this.errors=[];
                swal("Please Wait!", "Sending Your Message...");
                axios.post("/contact.store",{
                    name:this.name,
                    email:this.email,
                    phone:this.phone,
                    message:this.message,
                   
                }).then(response => {
                    this.success=true;
                    this.errors=[];
                    this.name = this.email = this.phone = this.message ='';
                	swal("Good job!", "Your Message has Been Sent", "success");
                    this.btnText="Send Now";
                   // event.target.reset();
                }).catch(error => {
                    this.btnText="Send Now";
                	swal("Oh Snap", "We've got an error while sending message Please try again!", "error");
                    this.errors=Object.values(error.response.data.errors);
                })
            }
        }
    }
</script>