import * as THREE from 'three'
import { getAllShortcodeElements, getPluginInfo, get3DViewerCptData } from '../utils'

/** TODO: add 3d scene */

const renderer = new THREE.WebGLRenderer()
renderer.setSize(window.innerWidth, window.innerHeight)
document.body.appendChild(renderer.domElement)

const allShortcodes = getAllShortcodeElements()
Array.from(allShortcodes).forEach((el) => {
  const { nameSnakeCase } = getPluginInfo() ?? {}
  const id = el.getAttribute(`data-${nameSnakeCase}-id`)

  if (id == null) {
    throw new Error(`Could not find data-id on element ${el.outerHTML}`)
  }

  const attributes = get3DViewerCptData(id)

  console.log(attributes)
})
