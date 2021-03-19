<template>
  <div class="relative">
    <quill-editor
      ref="editor"
      :id="`form-${field.column_name}`"
      class="text-base block mt-1 w-full editor-height mb-12"
      v-model:value="selected"
      :options="editorOptions"
      @change="onEditorChange($event)"
    />
  </div>
</template>

<script>
import { reactive } from 'vue'
import { quillEditor, Quill } from 'vue3-quill'

export default {
  props: [
    'modelValue',
    'field',
    'errors',
    'formMeta',
    'model',
    'action'
  ],

  emits: [
    'update:modelValue'
  ],

  components: {
    quillEditor
  },

  watch: {
    modelValue (newVal, oldVal) {
      if (newVal && newVal !== oldVal) {
        this.selected = newVal
      }
    },

    selected (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('update:modelValue', newVal)
      }
    }
  },

  data () {
    return {
      selected: null,
      editorOptions: {
        theme: 'snow',
        modules: {
          toolbar: [
            [ 'bold', 'italic', 'underline', 'strike' ],
            [ 'blockquote', 'code-block' ]
          ]
        }
      }
    }
  },

  methods: {
    onEditorChange ($event) {
      this.selected = $event.html
    }
  },

  mounted () {
    if (this.modelValue) {
      this.selected = this.modelValue
    }
  }
}
</script>

<style lang="sass" scoped>
.editor-height
  height: 12rem!important
</style>
