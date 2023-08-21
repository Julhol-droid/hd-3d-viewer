import * as THREE from 'three'
import { getShortcodeAttr } from '../utils'

/** TODO: add 3d scene */

const renderer = new THREE.WebGLRenderer()
renderer.setSize(window.innerWidth, window.innerHeight)
document.body.appendChild(renderer.domElement)

console.log(getShortcodeAttr(18))
