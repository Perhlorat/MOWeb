<polymer-element name="my-desk" attributes="user settings url addurl posts">
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
        box-shadow: 6px -1px 4px -1px rgba(0, 0, 0, 0.3);
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

    .card {
        display: block;
        margin: 0px 0px 40px 0;
        background-color: #fff;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        border-radius: 2px;
        overflow: hidden;
        width: 100%;
    }

    .draggable {
        background-color: #ffffff;
    }

    .draggable paper-icon-button {
        color: #000000;
    }

    .container {
        margin-top: 10px;;
    }
</style>
<core-toolbar style="background: #3f51b5; z-index: 1">
    <a href="javascript:void(0)" id="menuIcon" on-click="{{clickHandler}}">
        <paper-icon-button icon="menu"></paper-icon-button>
    </a>
    <a href="javascript:void(0)" id="menuIcon" on-click="{{handleAdd}}">
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
            <paper-toggle-button value={{settings.view}} on-change="{{handleToggle}}"
                                 id="settingsView"></paper-toggle-button>
        </template>
        <template if="{{ settings.view == 1 }}">
            <paper-toggle-button value={{settings.view}} on-change="{{handleToggle}}" id="settingsView"
                                 checked></paper-toggle-button>
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
<core-animated-pages transitions="cross-fade">
    <div layout vertical flex style="width: 100%; z-index:99">
        <div fit hero-p>
            <div class="container" flex horizontal wrap around-justified layout cross-fade>
                <template repeat="{{ post in posts }}">
                    <section>
                        <div class="card draggable" vertical center center-justified layout cross-fade
                             hero-id="card[[post.id]]" hero
                             style="width: 560px;  height: 315px;"
                             id="card[[post.id]]">
                            <core-toolbar style="background: #ffffff;">
                                <div horizontal end-justified layout flex>
                                    <paper-input id="cardInput[[post.id]]" label="url" value="{{post.url}}"
                                                 on-change="{{postChangeHandler}}"></paper-input>
                                </div>
                                <paper-icon-button id="close[[post.id]]" icon="close"
                                                   on-click="{{removePost}}"></paper-icon-button>
                            </core-toolbar>
                            <template if="{{post.url != ''}}">
                                <iframe src="{{post.url}}" width="560" height="315" allowfullscreen
                                        frameborder="0"></iframe>
                            </template>
                            <template if="{{post.url == ''}}">
                                <div layout horizontal center
                                     style=" max-height:315px; max-width:560px; width: 1920px; height: 1080px">
                                    <div style="margin:0 auto">
                                        <span style="color:#000000">Empty Url</span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </section>
                </template>
            </div>
        </div>
    </div>
</core-animated-pages>
</div>
<core-ajax id="ajax"
           auto="false"
           method="POST"
           url="{{url}}"
           handleas="json"
           params='{"view" : "{{settings.view}}", "gmail" : "{{settings.gmail}}","mail" : "{{settings.mail}}","yandex" : "{{settings.yandex}}", "ajax": "set-settings"}'
           on-core-response="{{handleResponse}}" on-core-error="{{handleError}}"></core-ajax>
</core-ajax>
<core-ajax id="addajax"
           auto="false"
           method="POST"
           url="{{urladd}}"
           handleas="json"
           params='{"ajax": "add-post"}'
           on-core-response="{{handleAddResponse}}" on-core-error="{{handleAddError}}"></core-ajax>
</core-ajax>
</template>
<script>
    jQuery.contains = function () {
        return true;
    };
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeft = document.getElementById('showLeft'),
        body = document.body;
    var polymerElement = '';
    Polymer('my-desk', {
        detached: function () {
        },
        ready: function () {
            polymerElement = this;
            this.settings = JSON.parse(this.settings);
            if (typeof this.posts != 'undefined')
                this.posts = JSON.parse(this.posts);
            else {
                this.posts = [];
            }
            this.url = '/site/set-settings';
            this.urladd = '/site/add-post';
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
                if (detail.response.msg == "ok") {
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
        handleToggle: function (event, detail, sender) {
            this.settings.view = sender.checked ? 1 : 0;
            var test = 1;
        },

        handleAdd: function (event, detail, sender) {
            try {
                this.$.addajax.go();
            }
            catch (e) {
                alert(e.message);
            }
        },
        removePost: function (event, detail, sender) {
            var id = sender.id;
            var postId = id.substr(5);
            test = 1;

            $.ajax({
                method: "POST",
                url: "/site/remove-post",
                data: { id: postId, ajax: "remove-post" },
                success: function () {
                    var counter = 0;
                    for (var i = 0; i < polymerElement.posts.length; i++) {
                        if (polymerElement.posts[i].id == postId) {
                            polymerElement.posts.splice(i, 1);
                            break;
                        }
                    }
                },
                error: function () {

                }
            });
        },

        postChangeHandler: function (event, detail, sender) {
            var id = sender.id;
            var postId = id.substr(9);
            test = 1;

            $.ajax({
                method: "POST",
                url: "/site/edit-post",
                data: { id: postId, url: sender.value, ajax: "update-post" },
                success: function (data) {
                    var counter = 0;
                    var jsonData = JSON.parse(data);
                    var widget = jsonData.widget
                    for (var i = 0; i < polymerElement.posts.length; i++) {
                        if (polymerElement.posts[i].id == postId) {
                            polymerElement.posts[i] = widget;
                            break;
                        }
                    }
                },
                error: function () {

                }
            });
        },
        handleAddError: function (event, detail, sender) {
        },
        handleAddResponse: function (event, detail, sender) {
            if (detail.response) {
                if (detail.response.msg == "ok") {
                    this.posts.push(detail.response.widget);
                }
            }
        },
        handleEditError: function (event, detail, sender) {
        },
        handleEditResponse: function (event, detail, sender) {
            if (detail.response) {
                if (detail.response.msg == "ok") {
                    this.posts.push(detail.response.widget);
                }
            }
        },
        incrementCounter: function () {
            this.counter++;
        }
    })
    ;
</script>
</polymer-element>