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
                        v-model="first_name"
                        required
                        placeholder="Enter first name"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Last Name:" label-for="last_name">
                <b-form-input
                        id="last_name"
                        v-model="last_name"
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
                        v-model="age"
                        type="text"
                        required
                        placeholder="Enter age"
                ></b-form-input>
            </b-form-group>

            <b-form-group id="input-group-2" label="Weight:" label-for="weight">
                <b-form-input
                        id="weight"
                        v-model="weight"
                        required
                        placeholder="Weight"
                ></b-form-input>
            </b-form-group>


            <b-button type="submit" variant="outline-primary">Edit</b-button>
        </b-form>
    </div>
</template>

<script>
    export default {
        name: "EditingForm",
        data() {
            return {
                weight: 0,
                age: 0,
                first_name: '',
                last_name: ''
            }
        },
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        methods: {
            onSubmit() {axios.put(`/users/${this.user.id}`, this.$data).then(({data}) => {
                    this.$emit('updated', data.user);
                    this.hideModal()
                });
            },
            hideModal() {
                this.$bvModal.hide('modal-edit')
            },
        },
        created() {
            this.weight = this.user.weight;
            this.age = this.user.age;
            let firstName = '';
            let lastName = '';
            [firstName, lastName] = this.user.name.split(' ');
            this.first_name = firstName;
            this.last_name = lastName;
        }
    }
</script>

<style scoped>

</style>