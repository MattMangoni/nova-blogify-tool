<template>
    <detail-file-field
        :resource="resource"
        :resource-name="resourceName"
        :resource-id="resourceId"
        :field="field" />
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
