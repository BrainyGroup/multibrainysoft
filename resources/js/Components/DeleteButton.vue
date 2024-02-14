<template>
  <button class="delete-button transition ease-in-out duration-150" @click="handleClick">
    <svg xmlns="http://www.w3.org/2000/svg"
       viewBox="0 0 20 20"
       fill="currentColor"
       class="w-4 h-4">
      <path fill-rule="evenodd" d="M13.414 10l4.293-4.293a1 1 0 1 0-1.414-1.414L12 8.586 7.707 4.293a1 1 0 0 0-1.414 1.414L10.586 10l-4.293 4.293a1 1 0 1 0 1.414 1.414L12 11.414l4.293 4.293a1 1 0 0 0 1.414-1.414L13.414 10z" clip-rule="evenodd" />
    </svg>
  </button>

</template>

<script>
export default {
  name: 'DeleteButton',
  methods: {
    handleClick() {

      if (confirm('Are you sure you want to delete this item?')) {
        this.$emit('delete');
      }
    }
  }
};
</script>

<style>
.delete-button {
  @apply text-red-900 px-4 py-2 rounded-md cursor-pointer;
}

.delete-button:hover {
  @apply text-red-400 bg-gray-200 rounded-full cursor-pointer;
  @apply text-3xl;
}
</style>
