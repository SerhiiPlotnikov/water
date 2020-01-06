<template>
    <div>
        <b-button
                variant="outline-primary"
                v-b-modal.modal
        >
            Add new user
        </b-button>

        <b-modal id="modal" title="Create new user">
            <creating-form @created="addNewUser"></creating-form>
        </b-modal>

        <users-table
                :style="{marginTop: 5+'px'}"
                :users="users"
                :openable="true"
                @remove="removeUser"
                @updated="updateUser"
        >
        </users-table>
    </div>
</template>

<script>
    import Table from "./Table";

    export default {
        name: "Users",
        components: {
            'users-table': Table
        },
        data() {
            return {
                users: this.availableUsers
            }
        },
        props: {
            availableUsers: {
                type: Array,
                required: true
            }
        },
        methods: {
            removeUser({id}) {
                axios.delete(`/users/${id}`, id).then(
                    () => this.users = this.users.filter(user => user.id !== id)
                );
            },
            addNewUser(user) {
                this.users = [user, ...this.users];
            },
            updateUser(user) {
                const index = this.users.findIndex(currentUser => currentUser.id === user.id);
                Vue.set(this.users, index, user);
            }
        },
    }
</script>

<style scoped>
</style>