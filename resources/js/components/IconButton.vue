<template>
    <button
        type="button"
        @keydown.enter.prevent="$emit('click')"
        @click.prevent="$emit('click')"
        tabindex="0"
        class="cursor-pointer dim btn btn-link inline-flex items-center"
    >
        <icon :type="type" view-box="0 0 20 20" width="16" height="16" />

        <slot />
    </button>
</template>

<script>
export default {
    name: 'icon-button',
    props: {
        type: String,
    }
}
</script>
