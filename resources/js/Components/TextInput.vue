<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
    type: String,
});

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        :type="type"
        class="border text-primary-500 border-indigo-500 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-lg"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
</template>
