<template>
    <v-snackbar transition="true" timeout="2000" v-model="show2" :color="color">
        <div class="d-flex justify-between w-full">
        <strong class="mr-10">
            {{ message }}
        </strong>
        <v-btn color="red" text @click="show2 = false">Close</v-btn>
        </div>
    </v-snackbar>
</template>

<script>
export default {
  props: {
    show: Boolean,
    color: String,
    message: String,
  },
  computed: {
    show2: {
      get() {
        return this.show;
      },
      set(value) {
        this.$emit("update", value);
      },
    },
  },
};
</script>