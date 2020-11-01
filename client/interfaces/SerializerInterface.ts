export interface SerializeItemInterface{}

export interface SerializerInterface {
  serialize: (v: SerializeItemInterface) => SerializeItemInterface;
  serializeMany: (v: SerializeItemInterface[]) => SerializeItemInterface[];
}
