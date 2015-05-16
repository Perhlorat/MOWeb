<polymer-element name="paper-password">

    <template>

        <style>
            :host {
                display: inline-block;
            }
        </style>

        <paper-input-decorator id="decorator_p" label="{{label}}" floatingLabel="{{floatingLabel}}" value="{{value}}" disabled?="{{disabled}}">
        <input is="core-input" id="input_p" type="password" value="{{value}}" committedValue="{{committedValue}}" on-change="{{changeAction}}" disabled?="{{disabled}}">
        </paper-input-decorator>

    </template>

    <script>

        Polymer('paper-password', {

            publish: {
                /**
                 * The label for this input. It normally appears as grey text inside
                 * the text input and disappears once the user enters text.
                 *
                 * @attribute label
                 * @type string
                 * @default ''
                 */
                label: '',

                /**
                 * If true, the label will "float" above the text input once the
                 * user enters text instead of disappearing.
                 *
                 * @attribute floatingLabel
                 * @type boolean
                 * @default false
                 */
                floatingLabel: false,

                /**
                 * Set to true to style the element as disabled.
                 *
                 * @attribute disabled
                 * @type boolean
                 * @default false
                 */
                disabled: {value: false, reflect: true},

                /**
                 * The current value of the input.
                 *
                 * @attribute value
                 * @type String
                 * @default ''
                 */
                value: '',

                /**
                 * The most recently committed value of the input.
                 *
                 * @attribute committedValue
                 * @type String
                 * @default ''
                 */
                committedValue: ''

            },

            /**
             * Focuses the `input`.
             *
             * @method focus
             */
            focus: function() {
                this.$.input_p.focus();
            },

            valueChanged: function() {
                this.$.decorator_p.updateLabelVisibility(this.value);
            },

            changeAction: function(e) {
                // re-fire event that does not bubble across shadow roots
                this.fire('change', null, this);
            }

        });

    </script>

</polymer-element>
