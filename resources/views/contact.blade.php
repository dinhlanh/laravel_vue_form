<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        [v-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto" id="app" v-cloak>
                <contact-component inline-template>
                    <div>
                        <h4 class="font-weight-semobold mb-4">Send a Message to US</h4>
                        <form class="contact-form" @submit.prevent="storeContact" method="POST" novalidate="novalidate"
                            @keydown="clearError">
                            <legend>Create contact</legend>
                            <div class="contact-form-success alert alert-success mt-4" v-if="success">
                                <strong>Success</strong> @{{ successMessage }}.
                            </div>

                            <div class="contact-form-error alert alert-danger mt-4" v-if="error">
                                <strong>Error!</strong> There was an error sending your message.
                                <span class="mall-error-message text-1 d-block">@{{ errorMessage }}</span>
                            </div>

                            <div class="form-row">
                                <div class="form-group col">
                                    <input class="form-control" :class="hasError('name') ? 'is-invalid' : ''" type="text" placeholder="You name" value="" maxlength="100"
                                           name="name" v-model="formData.name"/>
                                    <span v-if="hasError('name')" class="invalid-feedback">@{{ getError('name') }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input class="form-control" :class="hasError('email') ? 'is-invalid' : ''" type="email" placeholder="You E-mail" value="" maxlength="100"
                                           data-msg-email="Please enter a valid adress." name="email" v-model="formData.email" />
                                    <span v-if="hasError('email')" class="invalid-feedback">@{{ getError('email') }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input class="form-control" :class="hasError('subject') ? 'is-invalid' : ''" type="text" placeholder="Subject" value="" maxlength="100"
                                           name="subject" v-model="formData.subject" />
                                    <span v-if="hasError('subject')" class="invalid-feedback">@{{ getError('subject') }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <textarea class="form-control" :class="hasError('message') ? 'is-invalid' : ''" type="text" placeholder="Message" value="" maxlength="5000"
                                        name="message" v-model="formData.message"></textarea>
                                    <span v-if="hasError('name')" class="invalid-feedback">@{{ getError('name') }}</span>
                                </div>
                            </div>
{{--                            <div class="form-row">--}}
{{--                                <div class="form-group col">--}}
{{--                                    <input class="form-control" type="text" placeholder="Status" value="" maxlength="2"--}}
{{--                                           name="status"  v-model="formData.status" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-row">
                                <div class="form-group col">
                                    <input :disabled="hasAnyError" type="submit" value="Send Message" class="btn btn-primary btn-lg mb-5"/>
{{--                                </div>--}}
{{--                                <div class="form-group col">--}}
                                    <button @click.prevent="reset" class="btn btn-warning btn-lg mb-5">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </contact-component>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/prettify/r298/prettify.min.js"></script>
</body>
</html>
