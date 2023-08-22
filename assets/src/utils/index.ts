import { type IGeneralPluginInfo, type I3dViewerCptData } from '../types'

declare const HdViewerPluginInfo: IGeneralPluginInfo | undefined

/**
 * Gets the Plugin Info Obj enqueued by PHP
 */
export const getPluginInfo = (): IGeneralPluginInfo | undefined => {
  const infos = HdViewerPluginInfo

  if (typeof infos === 'undefined' || infos == null) {
    throw new Error('No Plugin Infos found')
  }

  return infos
}

/**
 * Gets the attributes for the specified
 * @param id The id of the CPT that this shortcode refers to
 */
export const get3DViewerCptData = (id: string): I3dViewerCptData | undefined => {
  const pluginName = getPluginInfo()?.name
  const shortcodeVariableName = `${pluginName}Shortcode${id}`
  const attributes = (window as any)[shortcodeVariableName]
  return attributes
}

/**
 * Gets the HTML Div Elements of all shortcodes on the page
 * @returns HTMLCollection of Elements
 */
export const getAllShortcodeElements = (): HTMLCollectionOf<Element> => {
  const pluginName = getPluginInfo()?.name

  if (pluginName == null) {
    throw new Error('No Plugin Name found inside the PluginInfo')
  }
  return document.getElementsByClassName(pluginName)
}
