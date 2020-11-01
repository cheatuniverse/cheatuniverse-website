FROM node:alpine

RUN mkdir -p /opt/app
RUN apk add --no-cache libc6-compat

WORKDIR /opt/app

COPY package.json /opt/app
COPY yarn.lock /opt/app
COPY . /opt/app

RUN addgroup -g 1001 -S nodejs
RUN adduser -S nextjs -u 1001
RUN chown -R nextjs:nodejs ./

USER nextjs

RUN yarn
RUN yarn build
RUN npx next telemetry disable

CMD [ "yarn", "start" ]
