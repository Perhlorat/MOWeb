

<polymer-element name="test-input" attributes="inputName label">
    <template>
        <app-globals id="globals" firstName="Vasya" lastName="Pupkin"></app-globals>
        <label>
            {{label}}
            <input type="text" name="{{inputName}}"/>
        </label>
    </template>
    <script>
        var foo_ = new Object();
        foo_.name = 'Foo';
        Polymer({
            message: "Hello!",
            get greeting() {
                return this.message + ' there!';
            },
            foo: function() {
                alert(foo_.name);
            },
            ready : function() {
                console.log('Logging' + this.$.globals.values.firstName);
            }
        });
    </script>
</polymer-element>