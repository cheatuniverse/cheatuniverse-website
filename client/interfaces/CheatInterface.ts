import { SerializeItemInterface } from 'interfaces/SerializerInterface';
import { APIPlatformItemInterface } from 'serializers/APIPlatformSerializer';
import { VersionAPIInterface } from 'interfaces/VersionInterface';
import { TagAPIInterface } from 'interfaces/TagInterface';

export interface CheatAPIInterface extends APIPlatformItemInterface {
  downloadLink: string;
  name: string;
  youtubeLink: string;
  tags: TagAPIInterface[];
  version: VersionAPIInterface;
  approved:true;
}

export interface CheatInterface extends SerializeItemInterface {
  chips: string[];
  downloadLink: string;
  name: string;
  youtubeLink: string;
}
