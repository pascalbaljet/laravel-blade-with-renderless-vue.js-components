import { mount } from '@vue/test-utils'
import PasswordGenerator from './../../resources/js/PasswordGenerator.vue'
import Vue from 'vue'
import expect from 'expect'

describe('PasswordGenerator', () => {
    it('can generate a random password', () => {
        let slotProps

        const wrapper = mount(PasswordGenerator, {
            scopedSlots: {
                default: props => {
                    slotProps = props
                }
            }
        })

        expect(slotProps.password).toBeNull();

        slotProps.generate()

        Vue.nextTick(() => {
            expect(slotProps.password).toHaveLength(16)
        })
    })
})