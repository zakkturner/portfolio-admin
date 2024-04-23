<template>
    <div class="flex flex-col mb-4">
        <label :for="label.toLowerCase()" v-if="label">{{ label }}</label>
        <textarea
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            v-bind="$attrs"
        ></textarea>
    </div>
</template>

<script setup>
defineProps({
    label: {
        type: [String, Boolean],
        default: false,
    },
    modelValue: {
        type: String,
        default: "",
    },
});
</script>

<style lang="scss" scoped></style>
