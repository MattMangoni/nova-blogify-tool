<template>
    <div>
        <heading class="mb-6">Blogify dashboard.</heading>

        <card class="flex flex-col items-center justify-center bg-90 text-20">
            <h1 class="text-4xl font-light mt-6 mb-2">Blogify</h1>
            <p class="mb-8">
                Status: <span disabled="disabled" class="ml-4 px-6 py-2 inline-block btn btn-danger rounded">Not installed</span>
            </p>
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
    checkInstallation() {}
  }
};
</script>
