<template>
    <div class="flex flex-col mb-4">
        <Label :for="label.toLowerCase()">{{ label }}</Label>
        <select
            name="category_id"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            v-bind="$attrs"
        >
            <slot />
        </select>
        <div>
            <slot name="error" />
        </div>
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
