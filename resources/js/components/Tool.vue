<template>
    <div>
        <heading class="mb-6">Blogify</heading>

        <card>
            <template v-if="messages.length !== 0">
                <div class="px-4 py-4 ">
                    <div class="mx-2 my-2 px-6 py-8 relative bg-80 text-20 rounded-lg">
                        <div class="absolute pin-t pin-r mr-2 mt-2 pr-1">
                            <button class="text-20 font-bold" @click="resetMessages"><strong>X</strong></button>
                        </div>
                        <div v-for="(message, index) in messages" :key="index">
                            <p>{{message}}</p>
                        </div>
                    </div>
                </div>
            </template>

            <div class="px-6 py-8 text-80">
                <template v-if="installed">
                    <h4 class="mb-4">Blogify is currently installed and active.</h4>
                    <button class="btn btn-default btn-danger" @click="deleteTables">Uninstall and delete blog tables</button>
                    <button class="btn btn-default bg-80 text-20 font-normal" @click="resetContent">Reset blog content</button>
                </template>

                <template v-else>
                    <p>
                        <span class="pr-4">Blogify DB tables not found.</span>
                        <button class="btn btn-default btn-primary" @click="install">Install</button>
                    </p>
                </template>
            </div>
        </card>
    </div>
</template>

<script>
export default {
    data() {
        return {
            installed: null,
            messages: [],
            error: false
        }
    },

    mounted() {
        this.installationCheck()
    },

    methods: {
        installationCheck () {
            Nova.request().get("/nova-vendor/nova-blogify-tool/check-migrations")
                .then(response => this.installed = response.data.installed)
                .catch(() => this.error = true)
        },

        install () {
            Nova.request().get("/nova-vendor/nova-blogify-tool/migrate-tables")
                .then(response => this.messages = response.data.messages)
                .then(() => this.reloadPage())
                .then(() => this.installationCheck())
                .catch(error => this.error = true)
        },

        resetContent () {
            this.resetMessages()

            Nova.request().get("/nova-vendor/nova-blogify-tool/reset-content")
                .then(response => this.messages = response.data.messages)
                .then(() => {
                     setTimeout(() => {
                        this.messages = [];
                    }, 2000)
                })
                .catch(error => this.error = true)
        },

        deleteTables () {
            this.resetMessages()

            Nova.request().get("/nova-vendor/nova-blogify-tool/uninstall")
                .then(response => this.messages = response.data.messages)
                .then(() => this.reloadPage())
                .catch(error => this.error = true)
        },

        resetMessages () {
            this.messages = []
        },

        reloadPage () {
           setTimeout(() => {
                window.location.reload()
            }, 1000)
        }
    }
}
</script>
