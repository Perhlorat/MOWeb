<polymer-element name="register-form" attributes="url">
    <template>
        <style>
            :host {
                display: block;
                position: relative;
                width: 60%;
                font-size: 1.2rem;
                font-weight: 300;
            }

            paper-input {
                color: #000000;
                text-align: left;
            }

            paper-button.colored {
                background: #000000;
                color: #ffffff;
            }

            .card {
                display: block;
                margin: 64px 0px 0px 0;
                background-color: #fff;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
                border-radius: 2px;
                overflow: hidden;
                width: 100%;
            }

            .header {
                font-size: 1.5em;
                color: #00BCD4;
                font-weight: lighter;
                color: rgb(0, 188, 212);
                font-family: 'RobotoDraft', sans-serif;
            }

            #check {
                width: 56px;
                height: 56px;
                background-color: #f5f5f5;
                color: black;
            }
            .container {
                margin-top:20px;
            }
            .nocolor {
                color: inherit;
            }

        </style>
        <div class="centered card" layout horizontal vertical center>
            <div class="container">
                <div class="header">Sign Up | <a class="nocolor" href="/site/login">Sign In</a></div>
                <paper-input on-change={{handleChange}} id="username" floatingLabel label="Username:"
                             value="{{username}}"></paper-input>
                <br/>
                <paper-input on-change={{handleChange}} id="email" floatingLabel label="Email:"
                             value="{{email}}"></paper-input>
                <br/>
                <paper-input-decorator style="display:inline-block" floatingLabel label="Password:">
                    <input on-change={{handleChange}} id="password" is="core-input" name="password"
                           type="password" value="{{password}}"/>
                </paper-input-decorator>
                <br/>
                <paper-checkbox id="rememberMe" floatingLabel label="Remember Me"
                                value="{{rememberMe}}"></paper-checkbox>
                <br/>
                <template if="{{error}}">
                    <div class="error">{{error}}</div>
                </template>
                <div horizontal="" center="" layout="">
                    <div flex></div>
                    <paper-fab id="check" icon="check" on-tap="{{doSend}}" role="button" tabindex="0"
                               aria-label="check" showing=""></paper-fab>
                </div>

                <br/>
                <core-ajax id="ajax"
                           auto="false"
                           method="POST"
                           url="{{url}}"
                           handleas="json"
                           params='{"RegisterForm[username]":"{{username}}", "RegisterForm[password]": "{{password}}", "RegisterForm[email]": "{{email}}",  "RegisterForm[rememberMe]": "{{rememberMe}}", "ajax": "login-form"}'
                           on-core-response="{{handleResponse}}" on-core-error="{{handleError}}"></core-ajax>
                </core-ajax>
            </div>
        </div>
    </template>
    <script>

        var loginForm = '';
        Polymer('register-form', {
            ready: function () {
                this.url = 'http://mo-web.loc/site/register';
                this.rememberMe = 1;
                loginForm = this;
            },
            doSend: function (event, detail, sender) {
                try {
                    this.$.ajax.go();
                }
                catch (e) {
                    alert(e.message);
                }
            },
            handleError: function (event, detail, sender) {
            },
            handleResponse: function (event, detail, sender) {
                if (detail.response) {
                    var response = detail.response;
                    if (response.msg) {
                        var msg = response.msg;
                        console.log(msg);
                        if ((typeof msg == 'string') && msg.toLowerCase() == 'ok') {
                            window.location.href = '/';
                        }
                        else {
                            $.each(msg, function (index, value) {
                                loginForm.error = value[0];
                            });
                        }
                    }
                }
            },
            handleChange: function () {
                this.error = '';
            }
        })
        ;
    </script>
</polymer-element>