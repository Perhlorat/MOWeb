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
        z-index: 100 !important;
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

    .cbpsmenu-inner {
        margin-top: 64px;
    }

    /* Orientation-dependent styles for the content of the menu */

    .cbp-spmenu-vertical {
        width: 320px;
        height: 100%;
        top: 0;
        z-index: 10;
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
        top: 0px;
    }

    .cbp-spmenu-left.cbp-spmenu-open {
        left: 0px;
        top: 0px;
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

    .cbp-spmenu .settingDiv paper-button {
        margin-top: 10px;
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
        margin: 5px 5px 5px 5px;
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
<core-toolbar style="background: #3f51b5; z-index: 999; position: fixed; width:100%; top:0">
    <a href="javascript:void(0)" id="menuIcon" on-click="{{clickHandler}}">
        <paper-icon-button icon="menu"></paper-icon-button>
    </a>
    <a href="javascript:void(0)" id="menuAdd" on-click="{{clickHandler}}">
        <paper-icon-button icon="add"></paper-icon-button>
    </a>

    <div horizontal end-justified layout flex><span>{{user}}</span></div>
    <a class="icon-button" href="/site/logout" target="_self">
        <paper-icon-button icon="close"></paper-icon-button>
    </a>
</core-toolbar>
<!-- body has the class "cbp-spmenu-push" -->
<nav layout vertical center class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbpspmenus1">
    <div class="cbpsmenu-inner">
        <h3>Settings</h3>

        <div center horizontal layout class="settingDiv">
            <paper-input flex floatingLabel label="Gmail email(for calendar)"
                         value="{{settings.showGmail}}"></paper-input>
        </div>
        <div center horizontal layout class="settingDiv">
            <paper-button on-click="{{doSend}}" raised style="margin: 0 auto;">Send</paper-button>
        </div>
    </div>
</nav>
<nav layout vertical center class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbpspmenus2">
    <div class="cbpsmenu-inner">
        <h3>Add menu</h3>

        <div center horizontal layout center-justified wrap class="settingDiv">
            <div layout center-justified vertical wrap>
                <paper-button raised on-tap="{{handleAdd}}" id="addDefault">
                    Default
                </paper-button>
                <paper-button raised on-tap="{{handleAdd}}" id="addIcon">
                    Icon
                </paper-button>
                <paper-button raised on-tap="{{handleAdd}}" id="addClock">
                    Clock
                </paper-button>
                <paper-button raised on-tap="{{handleAdd}}" id="addGoogleCalendar">
                    Google Calendar
                </paper-button>
                <paper-button raised on-tap="{{handleAdd}}" id="addWeather">
                    Weather
                </paper-button>
                <paper-button raised on-tap="{{handleAdd}}" id="addMaps">
                    Maps
                </paper-button>
                <paper-button raised on-tap="{{handleAdd}}" id="addFlickr">
                    Flickr Gallery
                </paper-button>
            </div>
        </div>
    </div>
</nav>
<div layout vertical flex style="width: 100%;z-index:99; margin-top:64px;">
<div class="container" flex horizontal wrap around-justified layout>
<template repeat="{{ post in posts }}">
<template if="{{post.type == 'default'}}">
    <div class="wrapper-div">
        <div class="card draggable" vertical center center-justified layout
             style="  width: 480px;   height: 350px;"
             id="card[[post.id]]">
            <core-toolbar style="background: #ffffff; width: 100%;">
                <div horizontal center-justified layout style="width:100%">
                    <paper-input id="cardInput[[post.id]]" label="Enter url" value="{{post.url}}"
                                 on-change="{{postChangeHandler}}" style="width:100%"></paper-input>
                </div>
                <paper-icon-button id="close[[post.id]]" icon="close"
                                   on-click="{{removePost}}"></paper-icon-button>
            </core-toolbar>
            <template if="{{post.url != ''}}">
                <iframe src="{{post.url}}" width="480" height="320" allowfullscreen
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
    </div>
</template>
<template if="{{post.type == 'icon'}}">
    <div class="card draggable" vertical center center-justified layout
         style="width: 350px;  height: 350px;"
         id="card[[post.id]]">
        <core-toolbar style="background: #ffffff; width: 100%;">
            <div horizontal center-justified layout style="width:100%">
                <paper-input id="cardInput[[post.id]]" label="Enter url" value="{{post.url}}"
                             on-change="{{postChangeHandler}}" style="width:100%"></paper-input>
            </div>
            <div horizontal end-justified layout flex></div>
            <paper-icon-button id="close[[post.id]]" icon="close"
                               on-click="{{removePost}}"></paper-icon-button>
        </core-toolbar>
        <template if="{{post.url != ''}}">
            <a href="{{post.url}}" target="_blank" style="width: 100%; height: 100%">
                <img style="max-width: 320px; max-height:320px;   margin-top: 33px;  margin-left: 26px;"
                     src="/files/polymer-logo.svg"
                    />
            </a>
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
</template>
<template if="{{post.type == 'clock'}}">
    <div class="card draggable" vertical center center-justified layout
         style="width: 350px;  height: 350px;"
         id="card[[post.id]]">
        <core-toolbar style="background: #ffffff; width: 100%;">
            <div horizontal center-justified flex></div>
            <paper-icon-button id="close[[post.id]]" icon="close"
                               on-click="{{removePost}}"></paper-icon-button>
        </core-toolbar>

        <!--<template if="{{post.url != ''}}">
            <iframe src="{{post.url}}" width="320" height="205" allowfullscreen
                    frameborder="0"></iframe>
        </template>-->
        <!--<template if="{{post.url == ''}}">-->
        <div layout horizontal center
             style=" max-height:315px; max-width:560px; width: 1920px; height: 1080px">
            <div style="margin:0 auto">
                <iframe scrolling="no" frameborder="no"
                        style="overflow:hidden;border:0;margin:0;padding:0;width:250px;height:250px;"
                        src="http://www.clocklink.com/html5embed.php?clock=001&timezone=GMT0600&color=blue&size=250&Title=&Message=&Target=&From=2015,1,1,0,0,0&Color=blue"></iframe>
            </div>
        </div>
        <!--</template>-->
    </div>
</template>
<template if="{{post.type == 'calendar'}}">
    <div class="card draggable" vertical center center-justified
         style="  width: 540px;   height: 350px;"
         id="card[[post.id]]">
        <core-toolbar style="background: #ffffff; width: 100%;">
            <div horizontal end-justified layout flex></div>
            <paper-icon-button id="close[[post.id]]" icon="close"
                               on-click="{{removePost}}"></paper-icon-button>
        </core-toolbar>
        <template if="{{settings.gmail != ''}}">
            <iframe src="https://www.google.com/calendar/embed?src={{settings.gmail}}&ctz=Asia/Aqtau" style="border: 0"
                    width="540" height="320" frameborder="0" scrolling="no"></iframe>
        </template>
        <template if="{{settings.gmail == ''}}">
            <div layout horizontal center
                 style=" max-height:315px; max-width:560px; width: 1920px; height: 1080px">
                <div style="margin:0 auto">
                    <span style="color:#000000">Change Gmail please</span>
                </div>
            </div>
        </template>
    </div>
</template>
<template if="{{post.type == 'weather'}}">
    <div class="card draggable" vertical center center-justified layout
         style="  width: 480px;   height: 350px;"
         id="card[[post.id]]">
        <core-toolbar style="background: #ffffff; width: 100%;">
            <div horizontal center-justified flex></div>
            <paper-icon-button id="close[[post.id]]" icon="close"
                               on-click="{{removePost}}"></paper-icon-button>
        </core-toolbar>
        <iframe src="/site/weather" width="320" height="320" allowfullscreen
                frameborder="0"></iframe>
    </div>
</template>
<template if="{{post.type == 'maps'}}">
    <div class="card draggable" vertical center center-justified layout
         style="  width: 480px;   height: 350px;"
         id="card[[post.id]]">
        <core-toolbar style="background: #ffffff; width: 100%;">
            <div horizontal end-justified layout flex></div>
            <paper-icon-button id="close[[post.id]]" icon="close"
                               on-click="{{removePost}}"></paper-icon-button>
        </core-toolbar>
            <iframe src="/site/maps" width="480" height="320" allowfullscreen
                    frameborder="0"></iframe>
    </div>
</template>
<!--
<template if="{{post.type == 'flickr'}}">
    <div class="card draggable" vertical center center-justified layout
         style="  width: 480px;   height: 350px;"
         id="card[[post.id]]">
        <core-toolbar style="background: #ffffff; width: 100%;">
            <div horizontal center-justified layout style="width:100%">
                <span style="color: #000;  width: 492px;  margin-top: 29px;">www.flickr.com/photos/</span>
                <paper-input inline id="cardInput[[post.id]]" label="Enter url" value="{{post.url}}"
                             on-change="{{fickrChangeHandler}}" style="width:100%"></paper-input>
            </div>
            <paper-icon-button id="close[[post.id]]" icon="close"
                               on-click="{{removePost}}"></paper-icon-button>
        </core-toolbar>
        <template if="{{post.url != ''}}">
            <div style="width:480px;height:320px;text-align:center;margin:auto;">
                <object width="480" height="320" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0">
                    <param name="flashvars"
                           value="offsite=true&amp;lang=en-us&amp;page_show_url=%2Fphotos%2Fpucki%2Fshow&amp;page_show_back_url=%2Fphotos%2Fpucki%2F&amp;user_id=44542478@N03"/>
                    <param name="allowFullScreen" value="true"/>
                    <param name="src" value="https://www.flickr.com/apps/slideshow/show.swf?v=71649"/>
                    <embed width="480" height="320" type="application/x-shockwave-flash"
                           src="https://www.flickr.com/apps/slideshow/show.swf?v=71649"
                           flashvars="offsite=true&amp;lang=en-us&amp;page_show_url=%2Fphotos%2Fpucki%2Fshow&amp;page_show_back_url=%2Fphotos%2Fpucki%2F&amp;user_id=44542478@N03"
                           allowFullScreen="true"/>
                </object>
            </div>
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
</template>-->
<template if="{{post.type == 'wolfram'}}">
    <div class="card draggable" vertical center center-justified layout
         style="  width: 350px;   height: 350px;"
         id="card[[post.id]]">
        <core-toolbar style="background: #ffffff; width: 100%;">
            <!--<div horizontal center-justified layout style="width:100%">
                <paper-input id="cardInput[[post.id]]" label="Enter url" value="{{post.url}}"
                             on-change="{{postChangeHandler}}" style="width:100%"></paper-input>
            </div>-->
            <div horizontal center-justified flex></div>
            <paper-icon-button id="close[[post.id]]" icon="close"
                               on-click="{{removePost}}"></paper-icon-button>
        </core-toolbar>
        <div layout horizontal center
             style=" max-height:315px; max-width:560px; width: 1920px; height: 1080px">
            <div style="margin:0 auto">
                <iframe src="/site/wolfram" width="320" height="200" allowfullscreen
                        frameborder="0"></iframe>
            </div>
        </div>

        <!--<template if="{{post.url != ''}}">
            <iframe src="{{post.url}}" width="320" height="205" allowfullscreen
                    frameborder="0"></iframe>
        </template>
        <template if="{{post.url == ''}}">

        </template>-->
    </div>
</template>
</template>
</div>
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
           params='{"ajax": "add-post", "addType": "{{addType}}"}'
           on-core-response="{{handleAddResponse}}" on-core-error="{{handleAddError}}"></core-ajax>
</core-ajax>
<core-ajax id="fileupload"
           auto="false"
           method="POST"
           url="{{urlUpload}}"
           handleas="json"
           on-core-response="{{handleUploadResponse}}"></core-ajax>
</core-ajax>
<core-ajax id="updatePost"
           auto="false"
           method="POST"
           url="{{url}}"
           handleas="json"
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
    page: 0,
    selectedItem: null,
    noTransition: false,
    detached: function () {
    },
    ready: function () {
        polymerElement = this;
        this.settings = JSON.parse(this.settings);
        this.settings.showGmail = this.settings.gmail.replace("%40", "@");
        if (typeof this.posts != 'undefined')
            this.posts = JSON.parse(this.posts);
        else {
            this.posts = [];
        }
        this.addType = 'default';
        this.url = '/site/set-settings';
        this.urladd = '/site/add-post';
        this.urlUpload = '/site/upload-file';
    },
    //Side menu
    clickHandler: function (event, detail, sender) {
        if (sender.id == 'menuIcon') {
            var current = this.$.menuIcon,
                menuLeft = this.$.cbpspmenus1,
                another = this.$.menuAdd,
                anotherLeft = this.$.cbpspmenus2;
        }
        else if (sender.id == 'menuAdd') {
            var current = this.$.menuAdd,
                menuLeft = this.$.cbpspmenus2,
                another = this.$.menuIcon,
                anotherLeft = this.$.cbpspmenus1;
        }
        classie.removeClass(another, 'active');
        classie.removeClass(anotherLeft, 'cbp-spmenu-open');
        classie.toggle(current, 'active');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
    },
    doSend: function (event, detail, sender) {
        this.settings.gmail = this.settings.showGmail;
        this.settings.gmail = this.settings.gmail.replace("@", "%40");
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

    //Add handler
    handleAdd: function (event, detail, sender) {
        switch (sender.id) {
            case 'addIcon':
            {
                this.addType = 'icon';
                break;
            }
            case 'addClock':
            {
                this.addType = 'clock';
                break;
            }
            case 'addGoogleCalendar':
            {
                this.addType = 'calendar';
                break;
            }
            case 'addWeather':
            {
                this.addType = 'weather';
                break;
            }
            case 'addMaps':
            {
                this.addType = 'maps';
                break;
            }
            case 'addFlickr':
            {
                this.addType = 'flickr';
                break;
            }
            case 'addWolfram':
            {
                this.addType = 'wolfram';
                break;
            }
            default :
            {
                this.addType = 'default';
            }
        }
        try {
            this.$.addajax.go();
        }
        catch (e) {
            alert(e.message);
        }
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

    //Remove handler
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
    //Post change handler
    postChangeHandler: function (event, detail, sender) {
        var id = sender.id;
        var postId = id.substr(9);
        test = 1;

        var currElement = '';
        for (var i = 0; i < polymerElement.posts.length; i++) {
            if (polymerElement.posts[i].id == postId) {
                currElement = polymerElement.posts[i];
                break;
            }
        }
        $.ajax({
            method: "POST",
            url: "/site/edit-post",
            data: { id: postId, url: sender.value, ajax: "update-post", type: currElement.type, settings: JSON.stringify(currElement.settings) },
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
    },

    //FileUpload
    setFiles: function (e, detail, sender) {
        var formData = new FormData();

        for (var i = 0, f; f = sender.files[i]; ++i) {
            formData.append(sender.name, f, f.name);
        }

        formData.append('postId', sender.id.substr(4));
        this.$.fileupload.body = formData;
        // Override default type set by core-ajax.
        // Allow browser to set the mime multipart content type itself.
        this.$.fileupload.contentType = null;
        this.upload(e, detail, sender);

    },
    upload: function (e, detail, sender) {
        if (!this.$.file.files.length) {
            alert('Please include a file');
            return;
        }
        this.$.fileupload.go();
    },
    handleUploadResponse: function (e, detail, sender) {
        if (detail.response) {
            if (detail.response.msg == "ok") {
                this.posts.push(detail.response.widget);
            }
        }
    },

    fickrChangeHandler: function (e, detail, sender) {
        console.log(sender);
        var id = sender.id;
        var postId = id.substr(5);

        $.ajax({
            method: "POST",
            url: "/site/flickr",
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
    }
})
;
</script>
</polymer-element>