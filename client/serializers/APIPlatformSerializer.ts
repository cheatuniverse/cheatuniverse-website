import { AbstractSerializer } from 'serializers/AbstractSerializer';
import { SerializeItemInterface } from 'interfaces/SerializerInterface';

export interface APIPlatformItemInterface {
  '@id': string;
}

export abstract class APIPlatformInstance {
  '@id': string;
  id: string;

  protected constructor(props: APIPlatformItemInterface) {
    this['@id'] = props['@id'];
    this.id = props['@id'].split('/')[2];
  }
}

export class APIPlatformSerializer extends AbstractSerializer {
  serialize(v: SerializeItemInterface) { return v }
  serializeMany(v: SerializeItemInterface[]) { return v }
}
