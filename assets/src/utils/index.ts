import { type IGeneralPluginInfo } from '../types'

declare const HdViewerPluginInfo: IGeneralPluginInfo | undefined

/**
 * Gets the Plugin Info Obj enqueued by PHP
 */
export const getPluginInfo = (): IGeneralPluginInfo | undefined => {
  try {
    const infos = HdViewerPluginInfo
    return infos
  } catch (error) {
    console.error(error)
  }
}

/**
 * Gets the attributes for the specified
 * @param id The id of the CPT that this shortcode refers to
 */
export const getShortcodeAttr = (id: string | number): string[] | undefined => {
  try {
    const name = getPluginInfo()?.name
    const attributes = [`${name}Shortcode${id}`]
    return attributes
  } catch (error) {}
}
