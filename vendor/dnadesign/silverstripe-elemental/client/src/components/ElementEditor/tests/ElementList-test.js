/* eslint-disable import/no-extraneous-dependencies */
/* global jest, describe, it, expect */

import React from 'react';
import { Component as ElementList } from '../ElementList';
import Enzyme, { shallow } from 'enzyme';
import Adapter from 'enzyme-adapter-react-15.4/build/index';

Enzyme.configure({ adapter: new Adapter() });

describe('ElementList', () => {
  const elementTypes = [
    {
      name: 'Main',
      title: 'Content',
      icon: '',
      tabs: ['', '']
    }
  ];

  const blocks = [
    {
      ID: '1',
      Title: 'Title',
      BlockSchema: {
        actions: { edit: '' }
      },
      InlineEditable: true,
      IsPublished: true,
      IsLiveVersion: true,
      Version: 6
    },
    {
      ID: '2',
      Title: 'Title II',
      BlockSchema: {
        actions: { edit: '' }
      },
      InlineEditable: true,
      IsPublished: false,
      IsLiveVersion: false,
      Version: 2
    },
  ];

  const Element = () => <div />;
  const Loading = () => <div />;
  const connectDropTarget = content => content;
  const HoverBar = 'div';

  describe('renderBlocks()', () => {
    it('renders elements when blocks are provided as props', () => {
      const wrapper = shallow(
        <ElementList
          key={'1'}
          blocks={blocks}
          elementTypes={elementTypes}
          ElementComponent={Element}
          LoadingComponent={Loading}
          HoverBarComponent={HoverBar}
          loading={false}
          areaId={1}
          connectDropTarget={connectDropTarget}
        />
      );

      expect(wrapper.name()).toEqual('div');
      expect(wrapper.find(Element).length).toBe(2);
      expect(wrapper.find(Loading).length).toBe(0);
    });

    it('renders a loading component', () => {
      const wrapper = shallow(
        <ElementList
          key={'2'}
          blocks={[]}
          elementTypes={elementTypes}
          ElementComponent={Element}
          LoadingComponent={Loading}
          HoverBarComponent={HoverBar}
          loading
          areaId={1}
          connectDropTarget={connectDropTarget}
        />
      );

      expect(wrapper.name()).toEqual('div');
      expect(wrapper.find(Element).length).toBe(0);
      expect(wrapper.find(Loading).length).toBe(1);
    });

    it('renders a placeholder message when no elements are provided as props', () => {
      const wrapper = shallow(
        <ElementList
          key={'3'}
          blocks={[]}
          elementTypes={elementTypes}
          ElementComponent={Element}
          LoadingComponent={Loading}
          HoverBarComponent={HoverBar}
          loading={false}
          areaId={1}
          connectDropTarget={connectDropTarget}
        />
      );

      expect(wrapper.name()).toEqual('div');
      expect(wrapper.find(Element).length).toBe(0);
      expect(wrapper.find(Loading).length).toBe(0);
      expect(wrapper.find('Add blocks to place your content').length).toBe(0);
    });
  });
});
