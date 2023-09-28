<script setup>
import { onMounted, onUnmounted } from "vue";
import { watch } from "vue";
import { defineProps } from "vue";

const props = defineProps({
    show: Boolean,
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(["close"]);

watch(
    () => props.show,
    () => {
        if (props.show) {
            document.body.style.overflow = "hidden";
        } else {
            document.body.style.overflow = null;
        }
    }
);

const close = () => {
    if (props.closeable) {
        emit("close");
    }
};

const closeOnEscape = (e) => {
    if (e.key === "Escape" && props.show) {
        close();
    }
};

onMounted(() => document.addEventListener("keydown", closeOnEscape));

onUnmounted(() => {
    document.removeEventListener("keydown", closeOnEscape);
    document.body.style.overflow = null;
});

const maxWidthClass = computed(() => {
    return {
        sm: "sm:max-w-sm",
        md: "sm:max-w-md",
        lg: "sm:max-w-lg",
        xl: "sm:max-w-xl",
        "2xl": "sm:max-w-2xl",
    }[props.maxWidth];
});
</script>
<template>
    <Transition name="modal">
        <div
            v-if="show"
            class="fixed z-50 inset-0 flex items-center justify-center bg-black bg-opacity-50 transition-opacity"
        >
            <div
                class="w-72 p-6 bg-white rounded-lg shadow-lg transform transition-all"
            >
                <div class="mb-4">
                    <slot name="header">default header</slot>
                </div>
                <div class="mb-6">
                    <slot name="body">default body</slot>
                </div>

                <div class="flex justify-end space-x-2">
                    <slot name="footer">
                        <button
                            class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200"
                            @click="$emit('close')"
                        >
                            OK
                        </button>
                    </slot>
                </div>
            </div>
        </div>
    </Transition>
</template>
<style scoped>
.modal-enter-from,
.modal-leave-to {
    opacity: 0;
}
.modal-enter-from .transform,
.modal-leave-to .transform {
    --tw-scale-x: 1.1;
    --tw-scale-y: 1.1;
    transform: scale(var(--tw-scale-x), var(--tw-scale-y));
}
</style>
