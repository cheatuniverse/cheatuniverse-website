import { SerializeItemInterface } from 'interfaces/SerializerInterface';
import { APIPlatformItemInterface } from 'serializers/APIPlatformSerializer';

export interface TagAPIInterface extends APIPlatformItemInterface {
  label: string;
}

export interface TagInterface extends SerializeItemInterface {
  label: string;
}
