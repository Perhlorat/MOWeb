<link rel="import" href="../../../bower_components/polymer/polymer.html">
<polymer-element name="app-globals">
    <script>
        (function() {
        var values = {};
                Polymer({  
                created: function() {
                    console.log('Created');
                },
                ready: function() {
                this.values = values;
                for (var i = 0; i < this.attributes.length; ++i) {
                var attr = this.attributes[i];
                        values[attr.nodeName] = attr.value;
                    }
                },
                attached: function () {
                    console.log(this.attributes);
                },
                domReady: function() {
                    console.log('Ready');
                },
                detached: function() {
                    console.log('Detached');
                },
                attributeChanged: function(attrName, oldVal, newVal) {
                    //var newVal = this.getAttribute(attrName);
                    console.log(attrName, 'old: ' + oldVal, 'new:', newVal);
                },
         });
        })();
    </script>
</polymer-element>