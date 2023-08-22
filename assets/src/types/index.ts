export interface IGeneralPluginInfo {
  name: string
  nameSnakeCase: string
}

export interface I3dViewerCptData {
  id: string | number
  postMeta: I3dViewerPostMeta
}

export interface I3dViewerPostMeta {
  files: IPostMetaFile[]
  title: string
}

export interface IPostMetaFile {
  file: string
  file_id: number
  title: string
}
