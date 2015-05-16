<polymer-element name="my-desk" attributes="user settings url">
    <template>
        <style>
            :host {
                z-index: 1;
            }

            paper-icon-button {
                color: #fff;
            }

            .icon-button {
                color: #fff;
            }

            .icon-button:hover {
                color: #fff;
            }

            .icon-button:active {
                color: #fff;
            }

            .icon-button:visited {
                color: #fff;
            }

            span {
                color: #fff;
            }

            .cbp-spmenu {
                background: #ffffff;
                position: fixed;
            }

            .cbp-spmenu h3 {
                color: #000000;
                font-size: 1.9em;
                padding: 20px;
                margin: 0;
                font-weight: 300;
                /*background: #0d77b6;*/
            }

            .cbp-spmenu a {
                display: block;
                color: #fff;
                font-size: 1.1em;
                font-weight: 300;
            }

            /* Orientation-dependent styles for the content of the menu */

            .cbp-spmenu-vertical {
                width: 320px;
                height: 100%;
                top: 0;
                z-index: 1000;
            }

            .cbp-spmenu-vertical a {
                /*border-bottom: 1px solid #258ecd;
                padding: 1em;*/
            }

            .cbp-spmenu-horizontal h3 {
                height: 100%;
                width: 20%;
                float: left;
            }

            .cbp-spmenu-horizontal a {
                float: left;
                width: 20%;
                padding: 0.8em;
                border-left: 1px solid #258ecd;
            }

            /* Vertical menu that slides from the left or right */

            .cbp-spmenu-left {
                left: -320px;
                top: 64px;
            }

            .cbp-spmenu-left.cbp-spmenu-open {
                left: 0px;
                top: 64px;
                box-shadow: 6px -1px 4px -1px rgba(0,0,0,0.3);
            }

            .cbp-spmenu-right.cbp-spmenu-open {
                right: 0px;
            }

            /* Transitions */

            .cbp-spmenu {
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                transition: all 0.3s ease;
            }

            @media screen and (max-height: 26.375em) {

                .cbp-spmenu-vertical {
                    font-size: 90%;
                    width: 320px;
                }

                .cbp-spmenu-left {
                    left: -320px;
                }

            }

            .settingDiv {
                width: 190px;
            }
        </style>
        <core-toolbar style="background: #3f51b5;">
            <a href="javascript:void(0)" id="menuIcon" on-click="{{clickHandler}}">
                <paper-icon-button icon="menu"></paper-icon-button>
            </a>
            <a href="javascript:void(0)" id="menuIcon" on-click="{{addWidget}}">
                <paper-icon-button icon="add"></paper-icon-button>
            </a>
            <div horizontal end-justified layout flex><span>{{user}}</span></div>
            <a class="icon-button" href="/site/logout" target="_self">
                <paper-icon-button icon="close"></paper-icon-button>
            </a>
        </core-toolbar>
        <!-- body has the class "cbp-spmenu-push" -->
        <nav layout vertical center class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbpspmenus1">
            <h3>Settings</h3>

            <div center horizontal layout class="settingDiv">
                <div flex>Custom view</div>
                <template if="{{ settings.view == 0 }}">
                    <paper-toggle-button value={{settings.view}} on-change="{{handleToggle}}" id="settingsView"></paper-toggle-button>
                </template>
                <template if="{{ settings.view == 1 }}">
                    <paper-toggle-button value={{settings.view}} on-change="{{handleToggle}}" id="settingsView" checked></paper-toggle-button>
                </template>
            </div>
            <div center horizontal layout class="settingDiv">
                <paper-input flex floatingLabel label="Gmail email" value="{{settings.gmail}}"></paper-input>
            </div>
            <div center horizontal layout class="settingDiv">
                <paper-input flex floatingLabel label="Yandex email" value="{{settings.yandex}}"></paper-input>
            </div>
            <div center horizontal layout class="settingDiv">
                <paper-input flex floatingLabel label="Mail.ru email" value="{{settings.mail}}"></paper-input>
            </div>
            <div center horizontal layout class="settingDiv">
                <paper-button on-click="{{doSend}}" raised style="margin: 0 auto;">Send</paper-button>
            </div>
        </nav>
        <core-ajax id="ajax"
                   auto="false"
                   method="POST"
                   url="{{url}}"
                   handleas="json"
                   params='{"view" : "{{settings.view}}", "gmail" : "{{settings.gmail}}","mail" : "{{settings.mail}}","yandex" : "{{settings.yandex}}", "ajax": "set-settings"}'
                   on-core-response="{{handleResponse}}" on-core-error="{{handleError}}"></core-ajax>
        </core-ajax>
    </template>
    <script>

        var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeft = document.getElementById('showLeft'),
            body = document.body;
        var loginForm = '';
        Polymer('my-desk', {
            ready: function () {
                this.settings = JSON.parse(this.settings);
                this.url = '/site/set-settings';
            },
            clickHandler: function () {
                var current = this.$.menuIcon,
                    menuLeft = this.$.cbpspmenus1;
                classie.toggle(current, 'active');
                classie.toggle(menuLeft, 'cbp-spmenu-open');
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
                    if(detail.response.msg == "ok") {
                        var newSettings = detail.response.settings;
                        this.settings.view = newSettings.view;
                        this.settings.mail = newSettings.mail;
                        this.settings.gmail = newSettings.gmail;
                        this.settings.yandex = newSettings.yandex;
                    }
                }
            },
            handleChange: function () {
                this.error = '';
            },
            handleToggle: function(event, detail, sender) {
                this.settings.view = sender.checked ? 1 : 0;
                var test = 1;
            }
        })
        ;
    </script>
</polymer-element>