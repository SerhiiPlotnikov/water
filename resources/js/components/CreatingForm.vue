<template>
    <div>
        <b-form
                ref="modal"
                @submit.prevent="onSubmit"
                :hide-footer="true"
        >
            <b-form-group id="input-group-2" label="First Name:" label-for="first_name">
                <b-form-input
                        id="first_name"
                        v-model="form.first_name"
                        required
                        placeholder="Enter first name"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Last Name:" label-for="last_name">
                <b-form-input
                        id="last_name"
                        v-model="form.last_name"
                        required
                        placeholder="Enter last name"
                ></b-form-input>
            </b-form-group>

            <b-form-group
                    id="input-group-1"
                    label="Age:"
                    label-for="age"
            >
                <b-form-input
                        id="age"
                        v-model="form.age"
                        type="text"
                        required
                        placeholder="Enter age"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Weight:" label-for="weight">
                <b-form-input
                        id="weight"
                        v-model="form.weight"
                        required
                        placeholder="Weight"
                ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="outline-primary">Create</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "CreatingForm",
        data() {
            return {
                form: {
                    weight: 0,
                    age: 0,
                    first_name: '',
                    last_name: ''
                },
            }
        },
        methods: {
            onSubmit() {
                axios.post('/users', this.$data.form).then(({data}) => {
                    this.$emit('created', data.user);
                    this.hideModal()
                });
            },
            hideModal() {
                this.$bvModal.hide('modal')
            },
        }
    }
</script>

<style scoped>

</style>