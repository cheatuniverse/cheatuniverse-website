import { SerializeItemInterface } from 'interfaces/SerializerInterface';

export abstract class AbstractSerializer implements SerializeItemInterface {
  serialize(v: SerializeItemInterface) { return v }
  serializeMany(v: SerializeItemInterface[]) { return v }
}
