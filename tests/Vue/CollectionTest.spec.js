import { mount } from '@vue/test-utils'
import Collection from './../../resources/js/Collection.vue'
import Vue from 'vue'

describe('Collection', () => {
    it('can push an item to the collection', () => {
        let slotProps

        const wrapper = mount(Collection, {
            propsData: {},
            scopedSlots: {
                default: props => {
                    slotProps = props
                }
            }
        })

        expect(slotProps.items).toEqual([])

        slotProps.push('test')

        Vue.nextTick(() => {
            expect(slotProps.items).toEqual(['test'])
        })
    })

    it('can put an item to the collection at a position', () => {
        let slotProps

        const wrapper = mount(Collection, {
            propsData: {},
            scopedSlots: {
                default: props => {
                    slotProps = props
                }
            }
        })

        expect(slotProps.items).toEqual([])

        slotProps.push('laravel')
        slotProps.push('bootstrap')
        slotProps.put(1, 'tailwind')

        Vue.nextTick(() => {
            expect(slotProps.items).toEqual(['laravel', 'tailwind'])
        })
    })

    it('can have a default array of items', () => {
        let slotProps

        const wrapper = mount(Collection, {
            propsData: {
                default: ['laravel']
            },
            scopedSlots: {
                default: props => {
                    slotProps = props
                }
            }
        })

        Vue.nextTick(() => {
            expect(slotProps.items).toEqual(['laravel'])
        })
    })

})