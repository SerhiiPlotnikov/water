<template>
    <users-table
            :users="availableUser"
            :openable="false"
            @remove="removeUser"
            @updated="updateUser"
    >
    </users-table>
</template>

<script>

    import Table from "./Table";

    export default {
        name: "User",
        components: {
            'users-table': Table
        },
        data() {
            return {
                availableUser: this.user
            }
        },
        props: {
            user: {
                type: Array,
                required: true
            }
        },
        methods: {
            removeUser({id}) {
                axios.delete(`/users/${id}`, id).then(
                    () => window.location.href = '/users'
                );
            },
            updateUser(user) {
                // console.log(this.availableBook);
                // this.availableBook = book;
                // const index = this.books.findIndex(currentBook=>currentBook.id===book.id);
                Vue.set(this.availableUser,0,user);
            }
        }
    }
</script>

<style scoped>

</style>