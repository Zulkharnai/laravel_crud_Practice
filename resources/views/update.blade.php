@extends('layout')
@section('title', 'Contact Page')
@section('content')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Update form </p>
                    <div class="my-5">
                        <form id="contactForm" action="update/<?php echo $data[0]->contact_id; ?>" method="post">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" value="<?php echo $data[0]->contact_name; ?>" name="contact_name" id="name" type="text" placeholder="Enter your name..."
                                    data-sb-validations="required" />
                                <label for="name">Name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" value="<?php echo $data[0]->contact_email; ?>" name="contact_email" id="email" type="email" placeholder="Enter your email..."
                                    data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" value="<?php echo $data[0]->contact_phone; ?>" name="contact_phone" id="phone" type="tel"
                                    placeholder="Enter your phone number..." data-sb-validations="required" />
                                <label for="phone">Phone Number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" value="<?php echo $data[0]->contact_massage; ?>" name="contact_massage" id="message" placeholder="Enter your message here..." style="height: 12rem"
                                    data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                                </div>
                            </div>
                            <br />
                            <button class="btn btn-primary text-uppercase" onclick="contactform()" id="submitButton"
                                type="button" ><a
                                class="nav-link px-lg-3 py-3 py-lg-4" href="{{url('/contactlist')}}">Update</a></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>

        function contactform(){

         $.get("{{route('contactform')}}", $("#contactForm").serialize(),
             (res)=>{
               console.log(res);
            }
         );
        }
    </script>
@endsection
