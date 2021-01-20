import { mount } from '@vue/test-utils'
import FileInput from './../../resources/js/FileInput.vue'
import Vue from 'vue'
import expect from 'expect'

describe('FileInput', () => {
    it('can grab the filename from the attached file', () => {
        let slotProps

        const wrapper = mount(FileInput, {
            scopedSlots: {
                default: props => {
                    slotProps = props
                }
            }
        })

        expect(slotProps.filename).toBeNull();

        const event = {
            target: {
                files: [
                    {
                        name: 'dummy.pdf'
                    }
                ]
            }
        }

        slotProps.changed(event);

        Vue.nextTick(() => {
            expect(slotProps.filename).toBe('dummy.pdf')


            slotProps.changed({
                target: {
                    files: []
                }
            });

            Vue.nextTick(() => {
                expect(slotProps.filename).toBeNull()
            })
        })
    })
})