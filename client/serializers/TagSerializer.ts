import { APIPlatformInstance, APIPlatformSerializer } from 'serializers/APIPlatformSerializer';
import { TagAPIInterface, TagInterface } from 'interfaces/TagInterface';

class Tag extends APIPlatformInstance implements TagInterface {
  label: string;

  constructor({ label, ...rest }: TagAPIInterface) {
    super(rest);
    this.label = label;
  }
}

export class TagSerializer extends APIPlatformSerializer {
  serialize(tag: TagAPIInterface) {
    return new Tag(tag);
  }

  serializeMany(tags: TagAPIInterface[]) {
    return tags.map(tag => new Tag(tag))
  }
}
