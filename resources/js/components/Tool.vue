<template>
    <div>
        <heading class="mb-6">Blogify dashboard.</heading>

        <card class="flex flex-col items-center justify-center bg-90 text-20">
            <h1 class="text-4xl font-light mt-6 mb-2">Blogify</h1>
            <div v-if="!installed" class="mb-8">
                <p class="flex justify-center text-center btn btn-danger px-6 py-2 rounded">Some tables are missing</p>
                <p class="mt-6 text-center"><code>Run `php artisan migrate` to start blogging</code></p>
            </div>
            <div v-else class="mb-8">
                <button class="flex justify-center text-center btn btn-danger px-6 py-2 rounded" @click="resetInstallation">Reset blog content</button>
            </div>
        </card>
    </div>
</template>

<script>
export default {
  mounted() {
    this.checkInstallation();
  },

  data() {
    return {
      installed: false
    };
  },

  methods: {
    checkInstallation() {
      Nova.request()
        .get("/nova-blogify/check-installation")
        .then(response => (this.installed = response.data.installation_status))
        .catch(() => (this.installed = false));
    },

    resetInstallation() {
      confirm("Are you sure? This will delete all your blog content!");

      Nova.request()
        .delete("/nova-blogify/reset-content")
        .then(response => {
          this.$toasted.show(response.data.message, { type: "success" });
          this.checkInstallation();
        })
        .catch(error => {
          this.$toasted.show(error.response.data.message, { type: "error" });
        });
    }
  }
};
</script>
