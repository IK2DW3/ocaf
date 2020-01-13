new Vue({
    el: '#app',
    data: {
      selectedType: '',
      selectedSize: '',
      items: [
        {
          name: 'name1',
          type: 'type1',
          size: 'size1'
        },
        {
          name: 'name2',
          type: 'type2',
          size: 'size2'
        },
        {
          name: 'name3',
          type: 'type1',
          size: 'size1'
        },
        {
          name: 'name4',
          type: 'type2',
          size: 'size2'
        }
      ]
    },
    computed: {
      computed_items: function () {
        let filterType= this.selectedType,
            filterSize = this.selectedSize
        return this.items.filter(function(item){
          let filtered = true
          if(filterType && filterType.length > 0){
            filtered = item.type == filterType
          }
          if(filtered){
            if(filterSize && filterSize.length > 0){
              filtered = item.size == filterSize
            }
          }
          return filtered
        })
      }
    }
  })