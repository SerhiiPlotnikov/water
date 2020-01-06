<template>
    <div>
        <b-modal id="modal-edit" title="Edit user">
            <editing-form
                    :user="selectedUser"
                    @updated="edit"
            ></editing-form>
        </b-modal>
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Weight</th>
                <th scope="col">Water amount(L)</th>
                <th scope="col">Edit</th>
                <th scope="col">Remove</th>

            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users">
                <th scope="row">{{user.id}}</th>
                <td v-if="openable">
                    <a
                            :href="'/users/'+user.id">{{user.name}}
                    </a>
                </td>
                <td v-else>
                    {{user.name}}
                </td>
                <td>{{user.age}}</td>
                <td>{{user.weight}}</td>
                <td>{{user.waterAmount}}</td>
                <td>
                    <b-button
                            variant="outline-primary"

                            @click="showModal(user)"
                    >
                        Edit
                    </b-button>
                </td>
                <td>
                    <b-button
                            variant="danger"
                            @click="$emit('remove',user)"
                    >
                        Remove
                    </b-button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "Table",
        props: {
            users: {
                type: Array,
                required: true
            },
            openable: {
                type: Boolean,
                required: true
            }
        },
        data() {
            return {
                selectedUser: null
            }
        },
        methods: {
            showModal(user) {
                this.selectedUser = user;
                this.$bvModal.show('modal-edit');
            },
            edit(user) {
                this.$emit('updated', user);
            }
        }
    }
</script>

<style scoped>

</style>