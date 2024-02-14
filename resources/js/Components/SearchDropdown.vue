

<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from 'vue'
import { createPopper } from '@popperjs/core'

const props = defineProps({
    placement: {
      type: String,
      default: 'bottom-end',
    },
    autoClose: {
      type: Boolean,
      default: true,
    },
})

const show = ref(false)
const popper = ref(null)

const toggleShow = () => {
  show.value = !show.value
}

onMounted(() => {
  const handleKeyDown = (e) => {
    if (e.key === 'Escape') {
      show.value = false
    }
  }
  document.addEventListener('keydown', handleKeyDown)

  const createPopperInstance = () => {
    if (show.value) {
      popper.value = createPopper(show.value.$el, ref.dropdown, {
        placement: props.placement,
        modifiers: [
          {
            name: 'preventOverflow',
            options: {
              altBoundary: true,
            },
          },
        ],
      })
    }
  }

  watch(show, createPopperInstance, { immediate: true })

  onBeforeUnmount(() => {
    document.removeEventListener('keydown', handleKeyDown)
    if (popper.value) {
      setTimeout(() => popper.value.destroy(), 100)
    }
  })
})
</script>


<template>
    <button type="button" @click="show = true">
      <slot />
      <div v-if="show">
        <div style="position: fixed; top: 0; right: 0; left: 0; bottom: 0; z-index: 99998; background: black; opacity: 0.2" @click="show = false" />
        <div ref="dropdown" style="position: absolute; z-index: 99999" @click.stop="show = !autoClose">
          <slot name="dropdown" />
        </div>
      </div>
    </button>
  </template>

